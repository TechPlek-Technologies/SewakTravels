import React, { useState, createContext } from "react";

export const AppContext = createContext();
const { Provider } = AppContext;

export default function ApplicationContextProvider(props) {
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);

  const initialData = {
    tripType: "",
    pickup: "",
    dropoff: "",
    pickupDate: tomorrow,
    pickupTime: "",
    distance:"",
    time:""
  };

  const [journeyData, setJourneyData] = useState(initialData);


  return (
    <Provider value={{ journeyData, setJourneyData}}>
      {props.children}
    </Provider>
  );
}
