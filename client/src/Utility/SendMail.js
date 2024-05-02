import axios from "axios";

export const SendMail = async (mailTo, mailText, mailHtml,subject) => {
  try {
    const response = await axios.post("http://localhost:5000/email", {
      toClient: mailTo,
      text: mailText,
      html: mailHtml,
      subject:subject
    });

    console.log("Mail sent successfully:", response.data);
    return response;
  } catch (error) {
    console.error("Error sending Email:", error);
    throw error;
  }
};
