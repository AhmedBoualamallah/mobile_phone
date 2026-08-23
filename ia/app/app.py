from flask import Flask, request, jsonify
import joblib
import pandas as pd
from pathlib import Path

app = Flask(__name__)

# Chemin vers le modèle
BASE_DIR = Path(__file__).resolve().parent.parent
MODEL_PATH = BASE_DIR / "models" / "price_predictor.joblib"

# Chargement du modèle
model = joblib.load(MODEL_PATH)


@app.route("/health", methods=["GET"])
def health():
    return jsonify({
        "status": "ok",
        "model": "price_predictor"
    })


@app.route("/predict", methods=["POST"])
def predict():
    data = request.get_json()

    smartphone = pd.DataFrame([data])

    prediction = model.predict(smartphone)[0]

    return jsonify({
        "predicted_price_inr": round(float(prediction), 2)
    })


if __name__ == "__main__":
    app.run(host="127.0.0.1", port=5000, debug=True)