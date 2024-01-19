import axios from "axios";

export const fetchData = async () => {
    try {
      const result = (await axios.get(`https://new.sewaktravels.com/blogsData`)).data;
      return result;
    } catch (err) {
      console.log(err);
      throw err; // Rethrow the error so it can be caught in the component
    }
  };