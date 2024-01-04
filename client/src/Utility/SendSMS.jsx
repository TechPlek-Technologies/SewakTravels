import axios from 'axios';

// Function to get authentication token
export const getAuthToken = async () => {
  try {
    const response = await fetch(
      'https://businesssms.co.in/proxy/AuthTokenV1/AuthToken?UserId=sewakcabs%40gmail.com&Password=Shriganesh%40123'
    );
    const data = await response.json();
    return data.TxnOutcome;
  } catch (error) {
    console.error('Error fetching authentication token:', error);
    throw error;
  }
};

// Function to send SMS
export const sendSMS = async (
  phoneNumber,
  text,
  senderID,
  dlrUrl,
  scheduleAt,
  pe,
  templateId
) => {
  try {
    const authToken = await getAuthToken();

    const response = await axios.post(
      'https://businesssms.co.in/proxy/SMSV1/SubmitSMS',
      {
        phNo: phoneNumber,
        text,
        senderID,
        dlrUrl,
        scheduleAt,
        pe,
        templateId,
      },
      {
        headers: {
          Authorization: `Bearer ${authToken}`,
          'Content-Type': 'application/json',
        },
        withCredentials: false, // Enable CORS credentials
        crossDomain: true, // Enable cross-domain requests
      }
    );

    console.log('SMS sent successfully:', response.data);
    return response.data;
  } catch (error) {
    console.error('Error sending SMS:', error);
    throw error;
  }
};
