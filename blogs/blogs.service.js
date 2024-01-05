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
    try {
        const blog = await db.tbl_blogs.findByPk(id);
        return blog;
    } catch (error) {
        throw error;
    }
}

module.exports = {
    getAll,
    getById,
};
