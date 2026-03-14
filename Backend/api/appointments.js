const express = require("express");
const router = express.Router();
const db = require("../db");

router.post("/book", (req, res) => {
  const { name, email, phone } = req.body;
    console.log("Received appointment data:", { name, email, phone });
    const sql = "INSERT INTO appointments (name,email,phone) VALUES (?,?,?)";

  db.query(sql, [name, email, phone], (err, result) => {
    if (err) {
      res.status(500).json({ success: false, message: "Error booking appointment" });
      return;
    }

    res.json({ success: true, message: "Appointment booked successfully" });
  });
});

router.get("/appointments", (req, res) => {
  const sql = "SELECT * FROM appointments";
  
  db.query(sql, (err, result) => {
    if (err) {
      res.status(500).send(err);
      return;
    }
    
    res.json(result);
  });
});

module.exports = router;