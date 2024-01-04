const { DataTypes } = require('sequelize');

module.exports = model;

function model(sequelize) {
    const attributes = {
        id: { type: DataTypes.INTEGER, autoIncrement: true, primaryKey: true },
        blog_title: { type: DataTypes.STRING(1000) },
        slug: { type: DataTypes.STRING(255) },
        banner_image: { type: DataTypes.STRING(255) },
        short_description: { type: DataTypes.STRING(1000) },
        description: { type: DataTypes.TEXT },
        meta_keywords: { type: DataTypes.STRING(255) },
        meta_description: { type: DataTypes.STRING(255) },
        alt_tag: { type: DataTypes.STRING(255) },
        blog_tags: { type: DataTypes.STRING(500) },
        blog_status: { type: DataTypes.INTEGER },
        created_by: { type: DataTypes.STRING(255) },
        creation_date: { type: DataTypes.DATE }
    };

    const options = {
        timestamps: false, // Exclude createdAt and updatedAt columns
    };

    return sequelize.define('tbl_blogs', attributes, options);
}
