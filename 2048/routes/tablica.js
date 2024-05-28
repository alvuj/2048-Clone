const express = require('express');
const router = express.Router();
const db = require('../connections');
// Require library
//var xl = require('excel4node');
const mysql = require('mysql');

var tablica = {
  tablica: function (req, res, next) {
    try {
      let sql = `
        SELECT u.user_name, hs.high_score, r.rank
        FROM tbl_user u
        LEFT JOIN tbl_high_score hs ON u.user_name = hs.user_name
        LEFT JOIN tbl_rank r ON hs.high_score > r.score
      `;
      db.query(sql, (err, result) => {
        if (err) throw err;
        if (result.length == 0) {
          res.json({ success: false, data: result, message: "Nema podataka u bazi" });
        } else {
          const formattedResults = result.map(row => {
            return {
              username: row.user_name,
              high_score: row.high_score,
              rank: row.rank
            };
          });
          res.json({ success: true, data: formattedResults, message: "Uspješno" });
        }
      });
    } catch (err) {
      res.send(err);
    }
  },
}  

module.exports = tablica;


