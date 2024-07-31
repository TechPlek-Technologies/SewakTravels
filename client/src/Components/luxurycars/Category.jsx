import React, { useState } from 'react'

const Category = ({ value, getCategories }) => {

   const categoryData = [
    {
        "id": 1,
        "type": "ALL"
    },
    {
        "id": 2,
        "type": "MERCEDES"
    },
    {
        "id": 3,
        "type": "BMW"
    },
    {
        "id": 4,
        "type": "Audi Q7"
    },
    {
      "id": 5,
      "type": "TOYOTA"
  }
]

const [category, setCategory] = useState("ALL");

const filterClick = (type) => {
    setCategory(type);
    if (type === "ALL") {
      getCategories(value);
    } else {
      const filtered = (value).filter((item) => item.category === type);
      getCategories(filtered);
    }
  };
  
  return (
    <ul>
      {categoryData.map((item,index) => (
        <li key={index} onClick={() => filterClick(item.type)} className={category === item.type ? "active" : ""}>
          {item.type}
        </li>
      ))}
    </ul>
  )
}

export default Category
