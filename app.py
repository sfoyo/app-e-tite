import json
import mysql.connector as db

chefScreen = []

def getMenuDataById(id):
    query = "select * from menu_items where client_id = "+str(id)
    myConn = db.connect(host="localhost", user="root", passwd="Ankitpal*1828542146")
    return myConn
    #return query

def getClientDetailsById(id):
    query = "select * from clients where client_id = "+str(id)
    return query

def sendOrderToChef(order):
    order = json.loads(order)
    chefScreen.append(order)

def orderFullflled(order_id):
    del(chefScreen[order_id])