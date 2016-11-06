#!/usr/bin/python
# -*- coding: utf-8 -*-

import sqlite3 as lite
import uuid
import cgi
import json
import hashlib

form = cgi.FieldStorage()

DB = 'test.db'
con = lite.connect(DB)

LINKS = {"FACEBOOK": "https://www.facebook.com/",
           "INSTAGRAM": "https://www.instagram.com/",
           "TWITTER": "https://twitter.com/",
           "SNAPCHAT1": "https://feelinsonice.appspot.com/web/deeplink/snapcode?username=",
           "SNAPCHAT2": "&size=400&type=PNG",
           "LINKEDIN": "https://www.linkedin.com/in/"}

TABLE_NAME = "Users"
COLUMNS = ["Username",
           "Password",
           "URL",
           "FIRST NAME",
           "LAST NAME",
           "FACEBOOK",
           "INSTAGRAM",
           "TWITTER",
           "SNAPCHAT",
           "LINKEDIN",
           "SKYPE"
           ]

def tableExists(name):
    cstr = "SELECT * FROM sqlite_master where type='table' and name='%s';" % TABLE_NAME
    cur.execute(cstr)
    if len(cstr) > 0:
        return True
    else: return False

def create_table():
    print "CREATING NEW TABLE..."
    script1 = "DROP TABLE IF EXISTS %s" % TABLE_NAME
    script2 = "CREATE TABLE %s(Id INTEGER PRIMARY KEY" % TABLE_NAME
    for col in COLUMNS:
        script2 += ", %s TEXT" % col
    script2 += ")"
    cur.execute(script1)
    cur.execute(script2)
    
def generate_URL():
    return uuid.uuid4().hex

def hs_pass(password):
    salt = uuid.uuid4().hex
    hashed_pass = hashlib.sha512(password + salt).hexdigest()
    return hashed_pass

def userExists(user):
    p = "SELECT * FROM %s WHERE %s = '%s'" % (TABLE_NAME, COLUMNS[0], user)
    cur.execute(p)
    exists = False
    try:
        if len(cur.fetchone()) > 0: exists = True
    except:
        pass
    print json.dumps(exists)
    return exists


def new_user(username, password, first, last):
    user = []
    user.append(username)
    user.append(password)
    user.append(generate_URL())
    user.append(first)
    user.append(last)
    
    script = "INSERT INTO %s(%s" % (TABLE_NAME, COLUMNS[0])
    for col in COLUMNS[1:len(user)]:
        script += ", %s" % col
        
    script += ") VALUES ('%s'" % user[0]
    for x in user[1:]:
        script += ", '%s'" % x
    script += ");"
    
    cur.execute(script)

def update(user, key, value):
    script = "UPDATE %s SET %s = '%s' WHERE %s = '%s'" % (TABLE_NAME, key, value, COLUMNS[0], user)
    print script
    cur.execute(script)

def delete_user(user):
    script = "DELETE FROM %s WHERE %s = '%s';" % (TABLE_NAME, COLUMNS[0], user)
    cur.execute(script)
    
def isValid(user, password):
    cur.execute("SELECT * FROM  %s WHERE %s = '%s'" % (TABLE_NAME, COLUMNS[0], user))
    p = cur.fetchone()
    valid = False
    if p == password: valid = True
    print json.dumps(valid)
    return valid
    
def get_user_info(user):
    cur.execute("SELECT * FROM %s WHERE %s = '%s'" % (TABLE_NAME, COLUMNS[0], user))
    stats = cur.fetchone()
    print json.dumps(stats)
    return stats

def get_media(user, media):
    info = get_user_info(user)
    u_link = info[COLUMNS.index(media) + 1]
    if u_link == None:
        link = None
    else:
        if media == "SNAPCHAT":
            link = LINKS["SNAPCHAT1"] + u_link + LINKS["SNAPCHAT2"]
        else:
            link = LINKS[media] + u_link
    print json.dumps(link)
    return link


    
######  COMMAND INPUT FROM JAVASCRIPT #####
cmd = form.getvalue('cmd')  # # ADD, DELETE, UPDATE, MEDIA, USER_EXISTS, IS_VALID

with con:
    cur = con.cursor()
    if not tableExists("Users"):
        create_table()
    get_media("username1", "TWITTER")
    
if cmd == "ADD": 
    user = form.getvalue("user")
    password = form.getvalue("password")
    first = form.getvalue("first_name")
    last = form.getvalue("last_name")
    new_user(user, password, first, last)
elif cmd == "DELETE": 
    try:
        user = form.getvalue("user")
        delete_user(user)
    except:
        user = form.getvalue("user")
        delete_user(user=user)
elif cmd == "UPDATE":
    user = form.getvalue("user")
    key = form.getvalue("key")
    value = form.getvalue("value")
    update(user, user, value)
elif cmd == "MEDIA":
    user = form.getvalue("user")
    media = form.getvalue("media")
    get_media(user, media)
elif cmd == "USER_EXISTS":
    user = form.getvalue("user")
    userExists(user)
elif cmd == "IS_VALID":
    user = form.getvalue("user")
    password = form.getvalue("password")
    isValid(user, password)
    
    
    
print "done"
