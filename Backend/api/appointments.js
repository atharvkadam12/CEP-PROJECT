const express = require("express");
const router = express.Router();
const db = require("../db");

router.post("/book", (req, res) => {
  const { name, email, phone } = req.body;
    console.log("Received appointment data:", { name, email, phone });
    const sql = "INSERT INTO appointments (name,email,phone) VALUES (?,?,?)";

  db.query(sql, [name, email, phone], (err, result) => {
    if (err) {
      res.status(500).send(err);
      return;
    }

    res.send("Appointment booked successfully");
  });
});

module.exports = router;