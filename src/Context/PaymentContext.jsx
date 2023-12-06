import React, { useState, createContext } from "react";

export const PaymentContext = createContext();
const { Provider } = PaymentContext;

export default function PaymentContextProvider(props) {
  
  const initialData = {
    firstName: "", 
    lastName: "",  // Fix: Change "LastName" to "lastName"
    email: "",
    contact: "",
    request:"",
    source: "",
    destination:"",
    tripType:"",
    startDate:"",
    returnDate:"",
    startTime:"",
    returnTime:"",
    totalPayment: 0,
    paymentDone: 0,
    paymentRemaining: 0
  };

  const [paymentData, setPaymentData] = useState(initialData);

  return (
    <Provider value={{ paymentData, setPaymentData }}>
      {props.children}
    </Provider>
  );
}
