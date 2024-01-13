const express = require("express");
const nodemailer = require("nodemailer");
const dotenv = require("dotenv");
dotenv.config();

const app = express();
app.use(express.json());

app.use("/running", (req, res) => {
    //write name email can alot of for sending...
    const {email, content} = req.body; // had content with you mind and replace "Hey, you trying day by day ? Oh amazing gutchop"
    try {
        if(!email){
            return res.status(400).json({message:"you need had name email 'll send !"});
        }

        const option = {
            service: 'gmail',
            auth: {
                user: process.env.NAME_EMAIL,
                pass: process.env.PASS_EMAIL
            }
        };

        var transporter = nodemailer.createTransport(option);

        transporter.verify(function (error, success) {
            if (error) {
                console.log(error);
            } else {
                var mail = {
                    from: process.env.NAME_EMAIL,
                    to: email,
                    subject: 'Anonymous =))',
                    text: 'Hey, you trying day by day ? Oh amazing gutchop',
                };
                transporter.sendMail(mail, function (error, info) {
                    if (error) {
                        console.log(error);
                    } else {
                        console.log('Email sent: ' + info.response);
                    }
                });
            }
        });
    } catch (err) {
        console.log("error try-catch: ", err);
    }
})


app.listen(3000, () => {
    console.log("project running on path 3000.");
})