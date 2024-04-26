import axios from "axios";

// Function to get authentication token
export const getAuthToken = async () => {
  try {
    const response = await fetch(
      "https://messaging.charteredinfo.com/AuthTokenV1/AuthToken?UserId=sewakcabs@gmail.com&Password=Shriganesh@991152"
    );
    const data = await response.json();
    console.log(data);
    return data.TxnOutcome;
  } catch (error) {
    console.error("Error fetching authentication token:", error);
    throw error;
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
      "https://messaging.charteredinfo.com/SMSV1/SubmitSMS",
      {
        ID: "sewakcabs@gmail.com",
        Pwd: "Shriganesh@991152",
        SenderID:"SEWAKT",
        PhNo: PhNo,
        Text: Text,
        templateId: "1007224836469319852",
      },
      {
        headers: {
          Authorization: `Bearer ${authToken}`,
          "Content-Type": "application/json",
        }
      }
    );

    console.log("SMS sent successfully:", response.data);
    return response.data;
  } catch (error) {
    console.error("Error sending SMS:", error);
    throw error;
  }
};
