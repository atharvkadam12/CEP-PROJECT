require("dotenv").config();
const express = require("express");
const appointmentRoutes = require("./api/appointments");

const app = express();
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.use("/api", appointmentRoutes);

app.listen(3000, () => {
  console.log("Server running on port 3000");
});