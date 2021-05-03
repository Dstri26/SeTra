from flask import Flask, render_template, request
from cv2 import imwrite, imread, resize, imshow
import cv2
import numpy as np
import tensorflow.keras.models
import re
import base64
import tensorflow as tf
import sys 
import os

food_keys = {0 : 'cheesecake',
 1 : 'chicken_curry',
 2 : 'donuts',
 3 : 'french_fries',
 4 : 'fried_rice',
 5 : 'grilled_cheese_sandwich',
 6 : 'ice_cream',
 7 : 'omelette',
 8 : 'pizza',
 9 : 'samosa'}

model = tf.keras.models.load_model('densenet201_85.h5')

app = Flask(__name__)

@app.route('/predict', methods = ['POST'])
def predict():
    image_name = request.get_data()
    x = imread(image_name)
    #x = np.invert(x)
    #imshow('test', x)
    #cv2.waitKey(0) 
    #cv2.destroyAllWindows()
    x = resize(x,(300, 300))
    x = x.reshape(1, 300, 300, 3)
    out = model.predict(x)
    #print(food_keys[np.argmax(out)])
    response = food_keys[np.argmax(out)]
    return response

if __name__ == '__main__':
    app.run(debug = True)
