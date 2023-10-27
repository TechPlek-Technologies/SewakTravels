import React,{ useState } from "react";


export const AppContext=React.createContext();
const {Provider} =AppContext;


export default function ApplicationContextProvider(props){
    const initalData={
        pickup:"",
        dropoff:"",
        pickupDate:"",
        pickupTime:""
    }

    const [journeyData,setJourneyData]= useState(initalData);

    
    return(
        <Provider value={{journeyData:journeyData,setJourneyData:setJourneyData}}>
            {props.children}
        </Provider>
    )
}

