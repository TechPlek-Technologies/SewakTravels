const db = require('_helpers/db');

async function getAll() {
    try {
        const blogs = await db.tbl_blogs.findAll({
            order: [['creation_date', 'DESC']]
        });
        return blogs;
    } catch (error) {
        throw error;
    }
}

async function getById(id) {
    return await db.tbl_blogs(id);
}

module.exports = {
    getAll,
    getById,
};
