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

  export const fetchBillingData = async () => {
    try {
      const result = (await axios.get(`https://new.sewaktravels.com/billing-details`)).data;
      return result;
    } catch (err) {
      console.log(err);
      throw err; // Rethrow the error so it can be caught in the component
    }
  };


export const addBillingData = async (payments) => {
  try {
    const response = await axios.post('https://new.sewaktravels.com/payments', payments);
    return response.data;
  } catch (err) {
    console.error(err);
    throw err; // Rethrow the error so it can be caught in the component
  }
};
