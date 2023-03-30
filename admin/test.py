import requests


def get_ip():
    response = requests.get('https://api64.ipify.org?format=json').json()
    return response["ip"]


def get_location():
    ip_address = get_ip()
    response = requests.get(f'https://ipapi.co/{ip_address}/json/').json()
    location_data = {
        "ip": ip_address,
        "longitude": response.get("longitude"),
        "latitude": response.get("latitude"),
        "country": response.get("country_name")
    }
    return location_data


location_data = get_location()

lat = location_data["latitude"]
long = location_data["longitude"]

print(lat, long)

url = "https://trueway-places.p.rapidapi.com/FindPlacesNearby"
tup = f"{lat},{long}"
querystring = {"location": tup,
               "type": "doctor", "radius": "1000", "language": "en"}
print(querystring)
headers = {
    "X-RapidAPI-Key": "8168da639cmsh1114f153faed8c2p11371ejsne70560170a3a",
    "X-RapidAPI-Host": "trueway-places.p.rapidapi.com"
}

response = requests.request("GET", url, headers=headers, params=querystring)
res = response.json()

for i in res["results"]:
    print(i["name"], i["address"])
