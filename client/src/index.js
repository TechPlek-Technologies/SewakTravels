import React from "react";
import ReactDOM from "react-dom/client";
import App from "./App";
import reportWebVitals from "./reportWebVitals";
import ApplicationContextProvider from "./Context/JourneyContext";
// import FlightContextProvider from "./Context/FlightContext";
import PaymentContextProvider from "./Context/PaymentContext";

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <React.StrictMode>
    <ApplicationContextProvider>
      <PaymentContextProvider>
        <App />
      </PaymentContextProvider>
    </ApplicationContextProvider>
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
