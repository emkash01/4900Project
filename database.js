const {Client} = require('pg')

const client = new Client({
    host: "localhost",
    user: "emmad",
    port: 5432,
    password: "root",
    database: "4900proj"
})


client.connect();

client.query(`Select * from movie`,(err, res) => {
    if(!err){
        console.log(res.rows);
    }
    else{
        console.log(err.message);
    }
    client.end;
})
