import requests, json, sys

key = '9f9a6a67713a2021786c3a9a89a05228'
search_url = 'http://food2fork.com/api/search'
recipe_url = 'http://food2fork.com/api/get'

# Gets json from f2f website
# Data passed in can include ingredients to search (e.g. 'q':'chicken')
r = requests.post(search_url, data={'key': key})
data = ''
#if r.status_code == 200:
data = json.loads(r.text)
#	print(data)
#else:
#	print('Request failed')

var = sys.argv("Please enter the number of the item do you want to see:")
vars = int(var)
# Gets the recipe_info for recipe 0 from above dictionary
id = data['recipes'][var]['recipe_id']
r2 = requests.post(recipe_url, data={'key': key, 'rId': id})
recipe_info = json.loads(r2.text)['recipe']

print('Completed')
# recipe_info.keys()	 <- prints all the keys of recipe_info, which is a dictionary
#dict_keys(['f2f_url', 'source_url', 'publisher', 'recipe_id', 'title', 
#'social_rank', 'publisher_url', 'image_url', 'ingredients'])

# Prints all the recipe titles
#for recipe_info in data['recipes']:
#	print(recipe_info['title'])

# Prints all the ingredients of one recipe
#for ingr in recipe_info['ingredients']:
#	print(ingr)
