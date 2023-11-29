import { useContext, useRef, useState } from "react";
import Summary from "../Components/Booking/Summary";
import TravelInfo from "../Components/Booking/TravelInfo";
import Animation from "../Components/Common/Animation";
import { carData } from "../Data/CabData";
import { AppContext } from "../Context/JourneyContext";

const Booking = ({desiredcar}) => {

  

  const { journeyData } = useContext(AppContext);
  // const targetId = param.id;


  const totalFare=journeyData?.travelDistance*desiredcar.fare;
  const initialData = {
    firstName: "",
    LastName: "",
    email: "",
    contact: "",
    request:"",
    source: "",
    destination:"",
    tripType:"",
    time:"",
    date:"",
    totalPayment:0,
    paymentDone:0,
    paymentRemaining:0
  };

  const [payableAmount,setpayableAmount]= useState(totalFare)

  const [paymentData, setPaymentData] = useState(initialData);

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
      name: "Merchant Name",
      description: "Purchase Description",
      image: "/your_logo.png",
      handler: function (response) {
        alert(response.razorpay_payment_id);
      },
      prefill: {
        name: "Harshil Mathur",
        email: "harshil@razorpay.com",
      },
      notes: {
        address: "Hello World",
      },
      theme: {
        color: "#FFFFFF",
      },
    };

    const paymentObject = new window.Razorpay(options);
    paymentObject.open();
  }

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

    

    setPaymentData({
      ...paymentData,
      firstName: firstNameRef.current.value,
      LastName: lastNameRef.current.value,
      email: emailRef.current.value,
      contact: contactRef.current.value,
      request: requestRef.current.value,
      source: journeyData.pickup,
      destination: journeyData.dropoff,
      tripType: journeyData.tripType,
      time: journeyData.pickupTime,
      date: journeyData.pickupDate,
  });

    displayRazorpay();
    console.log(paymentData)
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
