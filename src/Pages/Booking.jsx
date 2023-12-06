import { useContext, useEffect, useRef, useState } from "react";
import Summary from "../Components/Booking/Summary";
import TravelInfo from "../Components/Booking/TravelInfo";
import Animation from "../Components/Common/Animation";
import { AppContext } from "../Context/JourneyContext";
import { getAuthToken, sendSMS } from "../Utility/SendSMS";
import { PaymentContext } from "../Context/PaymentContext";


const Booking = ({desiredcar}) => {
  const { journeyData } = useContext(AppContext);
  const {paymentData,setPaymentData}=useContext(PaymentContext);

  useEffect(() => {
    // Scroll to the top of the page when the component mounts
    window.scrollTo(0, 0);

    // Redirect to home page if source or destination is empty
    if (!paymentData.totalFare) {
      window.location.href = "/";; // Replace "/" with the actual path of your home page
    }
  }, [ journeyData.source, journeyData.destination]);

 
  // const targetId = param.id;


  const totalFare=paymentData.totalFare;
 

  const [payableAmount,setpayableAmount]= useState(totalFare)



  const firstNameRef = useRef(null);
  const lastNameRef = useRef(null);
  const emailRef = useRef(null);
  const contactRef = useRef(null);
  const requestRef = useRef(null);

  const [isValid, setIsValid] = useState(false);

  

  async function displayRazorpay() {
    const options = {
      key: "rzp_test_hX6SQgVEX8tr9g",
      amount: payableAmount*100, // 2000 paise = INR 20, amount in paisa
      name: "Sewak Travels",
      description: "Purchase Description",
      image: "/assets/img/logo.png",
      handler: function (response) {
        sendSmsWithDynamicSchedule()

      

        window.location.href = `/payment/${response.razorpay_payment_id}`
      },
      prefill: {
        name: firstNameRef.current.value, 
        email: emailRef.current.value,
      },
      notes: {
        address: "Hello World",
      },
      theme: {
        color: "#ef3f3e",
      },
    };

    const paymentObject = new window.Razorpay(options);
    paymentObject.open();
  }


  async function sendSmsWithDynamicSchedule() {
    try {
      const authToken = await getAuthToken();
  
      // Use the authToken to send SMS
      const response = await sendSMS(
        authToken,
        '9993557535',
        'Your SMS text here',
        'YourSenderID',
        'YourDLRUrl',
        '2/12/2023 04:50 PM',
        'YourPE',
        'YourTemplateId'
      );
  
      console.log('SMS sent successfully:', response);
    } catch (error) {
      console.error('Error:', error);
    }
  }
  
  // Call the function to send SMS with dynamic schedule

  const handleButtonClick = () => {
    // Validation logic for GuestDetailPage
    const missingFields = [
      firstNameRef,
      lastNameRef,
      emailRef,
      contactRef,
    ].filter((ref) => !ref.current || !ref.current.value);

    if (missingFields.length > 0) {
      setIsValid(false);

      // Focus on the first missing field
      missingFields[0].current.focus();
      return;
    }else{
      setIsValid(true);
    }

    const updatedObject = {
      firstName:firstNameRef.current.value,
      lastName:lastNameRef.current.value,
      email: emailRef.current.value,
      contact: contactRef.current.value,
      request: requestRef.current.value||"",
      source: journeyData.source,
      destination: journeyData.destination,
      tripType:journeyData.selectedValue,
      startDate:journeyData.startDate,
      returnDate:journeyData.returnDate,
      startTime:journeyData.startTime,
      returnTime:journeyData.returnTime,
      totalPayment:totalFare,
      paymentDone:payableAmount,
      paymentRemaining:totalFare-payableAmount,
    };
    setPaymentData(updatedObject);
 

    displayRazorpay();
 

  };



  return (
    <section className="section-b-space bg-inner animated-section">
      <Animation />
      <div className="container">
        <div className="row">
          <TravelInfo
            isValid={isValid}
            contactRef={contactRef}
            emailRef={emailRef}
            lastNameRef={lastNameRef}
            firstNameRef={firstNameRef}
            requestRef={requestRef}
            desiredcar={desiredcar}
            payableAmount={payableAmount}
          />
          <Summary
          paymentData={paymentData}
            isValid={isValid}
            handleButtonClick={handleButtonClick}
            desiredcar={desiredcar}
            payableAmount={payableAmount}
            setpayableAmount={setpayableAmount}
          />
        </div>
      </div>
    </section>
  );
};

export default Booking;
