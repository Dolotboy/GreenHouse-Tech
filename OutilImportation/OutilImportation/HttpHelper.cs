using System;
using System.Collections.Generic;
using System.Text;
using System.Threading.Tasks;
using System.Net.Http;
using System.Net.Http.Headers;
using Newtonsoft.Json;

namespace OutilImportation
{
    class HttpHelper
    {
        static DateTime lastApiCall = default(DateTime);
        static double apiCallInterval = 0.5;

        static HttpClient GenerateClient()
        {
            HttpClient client = new HttpClient();
            client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));
            client.DefaultRequestHeaders.Add("Authorization", "Basic " + System.Convert.ToBase64String(Encoding.GetEncoding("ISO-8859-1").GetBytes("admin@pcst.xyz" + ":" + "PcstAdmin2021")));
            return client;
        }

        public static async void PushData(string baseUrl, List<Problem> problems, List<Plant> veggies)
        {
            try
            {
                using (HttpClient client = GenerateClient())
                {
                    foreach (Problem problem in problems)
                    {
                        Response response = await PushProblem(baseUrl, problem, client);
                        Interface.WriteLine(response.ToString());
                    }
                    Interface.WriteLine("Problems where pushed.");

                    foreach (Plant veg in veggies)
                        await PushPlant(baseUrl, veg, GenerateClient());
                    Interface.WriteLine("Problems where pushed.");

                    Interface.WriteLine("Everything was pushed.");
                }
            }
            catch (Exception e)
            {
                Interface.WriteLine(e.Message);
            }
        }

        static async Task PushPlant(string baseUrl, Plant plant, HttpClient client)
        {
            Response plantResponse = await PostContent($"{baseUrl}new/plant/addPlant", new StringContent(plant.ToString(), Encoding.UTF8, "application/json"), client);
            if (plantResponse.success)
            {
                Interface.WriteLine($"\nPlant #{plantResponse.id} added successfully");
                foreach (ConditionNb cond in plant.conditionsNbs)
                {
                    Response condResponse = await PostContent($"{baseUrl}new/condition/addFavCondNb", new StringContent(cond.ToString(), Encoding.UTF8, "application/json"), client);
                    if (condResponse.success)
                    {
                        Interface.WriteLine($"Range #{condResponse.id} added successfully");
                        Response assignResponse = await PostContent($"{baseUrl}assign/condition/nb/{plantResponse.id}/{condResponse.id}", new StringContent("", Encoding.UTF8, "application/json"), client);
                        if (assignResponse.success)
                            Interface.WriteLine($"Range #{condResponse.id} assigned successfully to plant #{plantResponse.id}");
                        else
                            Interface.WriteLine(assignResponse.ToString());
                    }
                    else
                        Interface.WriteLine(condResponse.ToString());
                }
                foreach (Problem problem in plant.problems)
                {
                    Response probResponse = await PostContent($"{baseUrl}assign/problem/{plantResponse.id}/{problem.DatabaseId}", new StringContent("", Encoding.UTF8, "application/json"), client);
                    if (probResponse.success)
                        Interface.WriteLine($"Problem #{problem.DatabaseId} assigned successfully to plant #{plantResponse.id}");
                    else
                        Interface.WriteLine(probResponse.ToString());
                }
            }
            else
                Interface.WriteLine("\n" + plantResponse.ToString());
        }

        static async Task<Response> PushProblem(string baseurl, Problem problem, HttpClient client)
        {
            try
            {
                Response response = await PostContent($"{ baseurl}new/problem/addProblem", new StringContent(problem.ToString(), Encoding.UTF8, "application/json"), client);
                if (!response.success)
                    throw new Exception(response.message);
                problem.DatabaseId = response.id;
                return response;
            }
            catch (Exception e)
            {
                return new Response() { id = "-1", success = false, message = e.Message };
            }
        }

        static async Task<Response> PostContent(string url, StringContent content, HttpClient client)
        {
            string responseString;
            try
            {
                double secondsSinceLastAPICall = (DateTime.Now - lastApiCall).TotalSeconds;
                if (lastApiCall != default(DateTime) && secondsSinceLastAPICall < apiCallInterval)
                    await Task.Delay(TimeSpan.FromSeconds((apiCallInterval - secondsSinceLastAPICall)));

                HttpResponseMessage response = await client.PostAsync(url, content);
                responseString = await response.Content.ReadAsStringAsync();
                lastApiCall = DateTime.Now;
                Response test = JsonConvert.DeserializeObject<Response>(responseString);

                return JsonConvert.DeserializeObject<Response>(responseString);
            }
            catch (Exception e)
            {
                return new Response() { id = "-1", message = $"{e.Message}\n{e.InnerException}", success = false };
            }
        }
    }
}
