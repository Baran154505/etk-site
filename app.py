
from flask import Flask, render_template, request, redirect, session
import json

app = Flask(__name__)
app.secret_key = 'bbhacksecretkey'

def load_users():
    with open("users.json", "r") as f:
        return json.load(f)

@app.route("/")
def index():
    if "user" in session:
        return redirect("/panel")
    return redirect("/login")

@app.route("/login", methods=["GET", "POST"])
def login():
    if request.method == "POST":
        users = load_users()
        username = request.form["username"]
        password = request.form["password"]
        if username in users and users[username] == password:
            session["user"] = username
            return redirect("/panel")
        return render_template("login.html", error="Hatalı giriş.")
    return render_template("login.html")

@app.route("/logout")
def logout():
    session.pop("user", None)
    return redirect("/login")

@app.route("/panel")
def panel():
    if "user" in session:
        return render_template("panel.html", user=session["user"])
    return redirect("/login")

@app.route("/terminal")
def terminal():
    if "user" in session:
        return render_template("terminal.html")
    return redirect("/login")

@app.route("/nasil-dizilir")
def nasil_dizilir():
    if "user" in session:
        return render_template("nasil-dizilir.html")
    return redirect("/login")

if __name__ == "__main__":
    app.run(debug=True)
