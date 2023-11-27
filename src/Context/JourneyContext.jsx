import React, { useState, createContext } from "react";

export const AppContext = createContext();
const { Provider } = AppContext;
 
export default function ApplicationContextProvider(props) {
  const tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);

  const dayAfterTomorrow=new Date()
  dayAfterTomorrow.setDate(tomorrow.getDate() + 2);

  const initialState={
    TabSelection:"",
    selectedValue:"",
    startDate:tomorrow,
    startTime:"",
    returnDate:dayAfterTomorrow,
    returnTime:"",
    travelDistance:"",
    travelTime:"" 
  }

  const [journeyData, setJourneyData] = useState(initialState);


  return (
    <Provider value={{ journeyData, setJourneyData}}>
      {props.children}
    </Provider>
  );
}
