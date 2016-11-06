#!/usr/bin/python
# -*- coding: utf-8 -*-

import sqlite3 as lite
import uuid
import cgi
form = cgi.FieldStorage()

DB = 'test.db'
con = lite.connect(DB)

TABLE_NAME = "Users"
COLUMNS = ["Username",
           "Password",
           "URL"
           ]

def create_table():
    script1 = "DROP TABLE IF EXISTS %s" % TABLE_NAME
    script2 = "CREATE TABLE %s(Id INTEGER PRIMARY KEY" % TABLE_NAME
    for col in COLUMNS:
        script2 += ", %s TEXT" % col
    script2 += ")"
    cur.execute(script1)
    cur.execute(script2)
    
def generate_URL():
    return uuid.uuid4().hex

def userExists(user):
    cur.execute("SELECT * FROM %s WHERE %s = %s" % (TABLE_NAME, COLUMNS[0], user))
    if len(cur.fetchone()) > 0:
        return True
    else:
        return False
    
def checkPass(password):
    if len(password) < 6:
        return "The password must be at least 6 characters long!"

def new_user():
    user = []
    while True: 
        u = user.append(raw_input("Enter user name: "))
        if not userExists(u):
            user.append(u)
            break
    user.append(raw_input("Enter password: "))
    user.append(generate_URL())
    
    script = "INSERT INTO %s(%s" % (TABLE_NAME, COLUMNS[0])
    for col in COLUMNS[1:]:
        script += ", %s" % col
        
    script += ") VALUES ('%s'" % user[0]
    for x in user[1:]:
        script += ", '%s'" % x
    script += ");"
    
    cur.execute(script)

def update(ID, user=False, password=False, URL=False):
    script = ""
    if user:
        script += "UPDATE %s SET %s = '%s'" % (TABLE_NAME, COLUMNS[0], user)
    if password:
        if user:
            script += ", "
        else:
            script += "UPDATE %s SET " % TABLE_NAME
        script += "%s = '%s'" % (COLUMNS[1], password)
    if URL:
        if user or password:
            script += ", "
        else:
            script += "UPDATE %s SET " % TABLE_NAME
        script += "%s = '%s'" % (COLUMNS[2], URL)
    script += " WHERE Id = %d;" % ID
    cur.execute(script)

def delete_user(ID=None, user=None):
    if ID:
        script = "DELETE FROM %s WHERE ID = %d;" % (TABLE_NAME, ID)
    elif user:
        script = "DELETE FROM %s WHERE %s = '%s';" % (TABLE_NAME, COLUMNS[0], user)
    cur.execute(script)
    
def isValid(user, password):
    cur.execute("SELECT * FROM  %s WHERE %s = '%s'" % (TABLE_NAME, COLUMNS[0], user))
    p = cur.fetchone()
    if p == password: return True
    else: return False
    
######  MAIN #####
cmd = form.getvalue('cmd')

# # ADD, DELETE, UPDATE

with con:
    cur = con.cursor()
    
if cmd == "ADD": 
    user = form.getvalue("user")
    password = form.getvalue("password")
    new_user(user, password)
elif cmd == "DELETE": 
    try:
        ID = form.getvalue("ID")
        delete_user(ID)
    except:
        user = form.getvalue("user")
        delete_user(user=user)
elif cmd == "UPDATE":
    ID = form.getvalue("ID")
    try:
        user = form.getvalue("user")
    except:
        user = False
    try:
        password = form.getvalue("password")
    except:
        password = False
        
    update(ID, user, password)
    

    
    
print "done"
