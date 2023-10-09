"use client";
import React, { createContext, useState } from "react";

// Define the context type
interface SearchContextType {
  to: string;
  from: string;
  setToAndFrom: (to: string, from: string) => void;
}

// Create the context
export const SearchContext = createContext<SearchContextType | undefined>(
  undefined
);

const { Provider } = SearchContext;

interface ApplicationContextProviderProps {
  children: React.ReactNode;
}

const SearchContextProvider: React.FC<ApplicationContextProviderProps> = (
  props
) => {
  const [to, setTo] = useState("");
  const [from, setFrom] = useState("");

  const setToAndFrom = (to: string, from: string) => {
    setTo(to);
    setFrom(from);
  };

  const contextValue: SearchContextType = {
    to,
    from,
    setToAndFrom,
  };

  return <Provider value={contextValue}>{props.children}</Provider>;
};

export default SearchContextProvider;
