import express from 'express';
import axios from 'axios';

const app = express();

const apiKey = process.env.GOOGLE_PLACES_API_KEY;

app.get('/places', async (req, res) => {
    try {
     
      const apiUrl = `maps.googleapis.com/maps/api/js?key=${apiKey}&libraries=places,geometry,directions`;
  
      const response = await axios.get(apiUrl);
      res.json(response.data);
    } catch (error) {
      res.status(500).json({ error: 'Error fetching data from Google Places API' });
    }
  });
  
  app.listen(3000, () => {
    console.log('Server is running on port 3000');
  });