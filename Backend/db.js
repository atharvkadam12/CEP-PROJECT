const mysql = require("mysql2");

const db = mysql.createConnection({
  host: process.env.HOST_NAME, 
  user: process.env.USER_NAME,
  password: process.env.PASSWORD,
  database: process.env.DATABASE_NAME,
  port:3306
});

db.connect((err) => {
  if (err) {
    console.error("Connection failed:", err);
  } else {
    console.log("Connected to RDS MySQL");
  }
});

module.exports = db;