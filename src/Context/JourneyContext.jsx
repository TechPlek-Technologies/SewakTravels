import React, { useState, createContext } from "react";

export const AppContext = createContext();
const { Provider } = AppContext;

export default function ApplicationContextProvider(props) {
  const initialData = {
    tripType: "",
    pickup: "",
    dropoff: "",
    pickupDate: "",
    pickupTime: ""
  };

  const [journeyData, setJourneyData] = useState(initialData);

  return (
    <Provider value={{ journeyData, setJourneyData }}>
      {props.children}
    </Provider>
  );
}
