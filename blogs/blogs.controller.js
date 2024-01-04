const express = require('express');
const router = express.Router();

const blogService = require('./blogs.service');


router.get('/', getAll);

router.get('/:id',  getById);


function getAll(req, res, next) {
    blogService.getAll()
        .then(users => res.json(users))
        .catch(next);
}

function getById(req, res, next) {
    blogService.getById(req.params.id)
        .then(user => res.json(user))
        .catch(next);
}

module.exports = router;