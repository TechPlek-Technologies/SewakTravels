import React, { useState, createContext } from "react";

export const Flight= createContext();
const { Provider } = Flight
 
export default function FlightContextProvider(props) {
 

  const initialState={
    
    selectedValue:"One-Way",
    
  }

  const [flightData, setFlightData] = useState(initialState);


  return (
    <Provider value={{ flightData, setFlightData}}>
      {props.children}
    </Provider>
  );
}
