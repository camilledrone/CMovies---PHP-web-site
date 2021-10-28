# -*- coding: utf-8 -*-
from flask import Flask, render_template, jsonify
import json
import requests
import http.client
import mimetypes
import plotly.express as px 
import numpy

lor = Flask(__name__)

LOR_API_URL = "http://openlibrary.org/search.json?q=the+lord+of+the+rings" 

@lor.route("/")
def hello():
    return render_template("home.html")


@lor.route('/dash/')
def dash():
    conn = http.client.HTTPSConnection("the-one-api.dev")
    headers = {
     'Authorization': 'Bearer iunqmFRolPctlcKN4LWH'
    }
    payload = ''
    conn.request("GET", "/v2/book?", payload, headers)
    res = conn.getresponse()
    data = res.read()
    data.decode("utf-8")
    json_dicti = json.loads(data)

    l=[]
    random_x = [] 
    names = []

    li=[json_dicti['docs']]
    for x in li[0]:
        names.append(x["name"]) #ok

    conn.request("GET", "/v2/movie?", payload, headers)
    mov=conn.getresponse()
    movie = mov.read()
    movie.decode("utf-8")
    json_dict = json.loads(movie)
    movies=[]
    budget=[]
    for y in json_dict['docs']:
        movies.append(y["name"])
        budget.append(y["budgetInMillions"])
    l=[budget,movies]
    df = px.data.stocks()
    #fig = px.histogram(l, x="movies") 
    #fig.show()

    #li[0][0]["name"]
    #result_ids = [result["name"] for result in json_dicti if "name" in result]
    
    for key in json_dicti:
       l.append([key, ":", json_dicti[key]])
       random_x.append(json_dicti[key])

          
    ##return jsonify({
     #   'status': 'ok', 
     #   'data': movies
    #})
    return render_template("home.html",name = movies)

    
  
    

    
    


if __name__ == "__main__":
    lor.run(debug=True)