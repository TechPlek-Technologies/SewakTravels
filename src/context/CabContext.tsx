
import React, { useState, createContext, ReactNode, useContext } from "react";

// Define the context
interface AppContextType {
  pickupLocation: string;
  dropLocation: string;
  setPickupLocation: (location: string) => void;
  setDropLocation: (location: string) => void;
}

export const CabContext = createContext<AppContextType | undefined>(undefined);

export function ApplicationContextProvider({ children }: { children: ReactNode }) {
  const [pickupLocation, setPickupLocation] = useState("");
  const [dropLocation, setDropLocation] = useState("");

  return (
    <CabContext.Provider value={{ pickupLocation, dropLocation, setPickupLocation, setDropLocation }}>
      {children}
    </CabContext.Provider>
  );
}