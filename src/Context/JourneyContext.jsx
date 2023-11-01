import React, { useState, createContext } from "react";

export const AppContext = createContext();
const { Provider } = AppContext;

export default function ApplicationContextProvider(props) {
  const initialData = {
    tripType: "",
    pickup: "",
    dropoff: "",
    pickupDate: "",
    pickupTime: "",
    distance:"",
    time:""
  };

  const [journeyData, setJourneyData] = useState(initialData);
  const [traveltime,setTravelTime]=useState("")
  const [travelDistance,setTravelDistance]=useState("")

  return (
    <Provider value={{ journeyData, setJourneyData,traveltime,setTravelTime,travelDistance,travelDistance }}>
      {props.children}
    </Provider>
  );
}
