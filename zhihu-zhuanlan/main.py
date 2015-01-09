#!/usr/bin/env python

import webapp2
import jinja2
import os
import urllib
from django.utils import simplejson as json

JINJA_ENVIRONMENT = jinja2.Environment(
    loader = jinja2.FileSystemLoader(os.path.dirname(__file__)),
    extensions = ['jinja2.ext.autoescape'],
    autoescape = True)

class MainPage(webapp2.RequestHandler):
  def get(self):
    self.response.headers['Content-Type'] = 'text/plain'
    self.response.write('zhihu zhuanlan RSS')

class PostHandler(webapp2.RequestHandler):
  def get(self, name):
    zhuanlan_api = "http://zhuanlan.zhihu.com/api/columns/"
    user = {}
    posts = []
    user_data = json.loads(urllib.urlopen(zhuanlan_api + name).read())
    posts_data = json.loads(urllib.urlopen(zhuanlan_api + name + "/posts?limit=10").read())
    template_values = {'user':user_data, 'posts':posts_data}
    template = JINJA_ENVIRONMENT.get_template('posts.xml')
    self.response.headers['Content-Type'] = 'xml'
    self.response.write(template.render(template_values))

routes = [
  (r'/', MainPage),
  (r'/(\w+)', PostHandler)
]

app = webapp2.WSGIApplication(routes = routes, debug = True)
