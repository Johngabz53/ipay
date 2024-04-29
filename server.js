const express = require('express');
const app = express();
const path = require('path');
const cors = require('cors');
const bodyParser = require('body-parser');




app.use(cors());
app.use(bodyParser.json());

// Endpoint to receive data from frontend
app.post('/updateContent', (req, res) => {
    const newData = req.body.newData; // Assuming frontend sends new data
    // Process newData, e.g., save to a database
    res.json({ success: true });
});

// Serve static files from the 'public' directory
app.use(express.static(path.join(__dirname, 'public')));

// Start the server
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server is running on port 3000`);
});
