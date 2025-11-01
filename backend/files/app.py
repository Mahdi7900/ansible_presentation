from flask import Flask, request, jsonify

app = Flask(__name__)

@app.route('/', methods=['GET'])
def home():
    return "Welcome to the Flask API!"

@app.route('/greet', methods=['GET'])
def greet():
    name = request.args.get('name', 'Guest')
    return jsonify(message=f"Hello, {name}!")

@app.route('/user/<username>', methods=['GET'])
def get_user(username):
    return jsonify(user=username, status="active")

@app.route('/submit', methods=['POST'])
def submit_data():
    data = request.get_json()
    if not data:
        return jsonify(error="No JSON data provided"), 400
    return jsonify(received=data, message="Data received successfully")

@app.route('/login', methods=['POST'])
def login():
    username = request.form.get('username')
    password = request.form.get('password')
    if username == 'admin' and password == '1234':
        return jsonify(message="Login successful")
    else:
        return jsonify(message="Invalid credentials"), 401

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
