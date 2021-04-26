# script used to download all god images
import requests

gods_file = open("gods.txt", "r")
error_file = open("error.txt", "w")

for line in gods_file:
    god_to_search = line.lower().strip() + ".jpg"
    search = line.capitalize().strip() + ".jpg"
    f = open(search, 'wb')
    try:
        url = "https://webcdn.hirezstudios.com/smite/god-cards/"
        f.write(requests.get(url + god_to_search).content)
    except:
        error_file.write(line.strip() + "\n")
    f.close()


gods_file.close()
error_file.close()




