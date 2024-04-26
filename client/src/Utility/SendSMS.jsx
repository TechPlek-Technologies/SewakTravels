import axios from 'axios';

export const getAuthToken = async () => {
  try {
    const response = await axios.post(
      "http://localhost:5000/get-auth-token",
      {
        UserId:"sewakcabs@gmail.com",
        Password:"Shriganesh@991152"
    },
      { withCredentials: true }
    );
    const data = response.data;
    console.log(data);
    return data.TxnOutcome;
  } catch (error) {
    console.error("Error fetching authentication token:", error);
  }
};

// Function to send SMS
export const sendSMS = async (
  PhNo,
  Text,
) => {
  try {
    const authToken = await getAuthToken();

    const response = await axios.post(
      "http://localhost:5000/submit-sms",
      {
        ID: "sewakcabs@gmail.com",
        Pwd: "Shriganesh@991152",
        PhNo: PhNo,
        Text: Text,
        authToken:authToken
      },
    );

    console.log("SMS sent successfully:", response.data);
    return response.data;
  } catch (error) {
    console.error("Error sending SMS:", error);
  }
};
