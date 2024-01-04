const mysql = require('mysql2/promise');
const { Sequelize } = require('sequelize');
const config = require('../config');

module.exports = db = {};

initialize();

async function initialize() {
    try {
        const { host, port, user, password, database } = config.database;

        // Create or connect to the database
        const connection = await mysql.createConnection({ host, port, user, password });
        await connection.query(`CREATE DATABASE IF NOT EXISTS \`${database}\`;`);
        await connection.end();

        // Connect to the database
        const sequelize = new Sequelize(database, user, password, { dialect: 'mysql' });

        // Initialize models and add them to the exported db object
        db.tbl_blogs = require('../blogs/blogs.model')(sequelize);

        // Sync all models with the database
        await sequelize.sync();
        console.log('Database synchronized successfully.');
    } catch (error) {
        console.error('Error initializing the database:', error);
    }
}

// No need to call initialize() again, as it's already called above
