import { useState, useRef, useEffect } from "react";
import useAutocomplete from "../Utility/Autocomplete";

const tomorrow = new Date();
tomorrow.setDate(tomorrow.getDate() + 1);
const dayAfterTomorrow = new Date();
dayAfterTomorrow.setDate(dayAfterTomorrow.getDate() + 3);

const initialState = {
  startDate: new Date(tomorrow),
  returnDate: new Date(dayAfterTomorrow),
  selectedValue: "Outstation One-Way",
  source: "",
  destination: "",
  totalDistance: 0,
  travelTime: 0,
  startTime: "12:00 PM",
  returnTime: "12:00 PM",
};

initialState.startDate.setUTCHours(0, 0, 0, 0);
initialState.returnDate.setUTCHours(0, 0, 0, 0);
const OutstationDataState = () => {
  const [state, setState] = useState(initialState);

  // Load state from local storage on initial render
  useEffect(() => {
    const storedState = localStorage.getItem("sewak_travelData");
    if (storedState) {
      setState(JSON.parse(storedState));
    }
  }, []);

  // Save state to local storage whenever it changes
  useEffect(() => {
    localStorage.setItem("sewak_travelData", JSON.stringify(state));
  }, [state]);

  const setStartDate = (date) => {
    setState((prevState) => ({ ...prevState, startDate: date }));
  };

  const setReturnDate = (date) => {
    setState((prevState) => ({ ...prevState, returnDate: date }));
  };

  const setSelectedValue = (value) => {
    setState((prevState) => ({ ...prevState, selectedValue: value }));
  };

  const setSource = (value) => {
    setState((prevState) => ({ ...prevState, source: value }));
  };

  const setDestination = (value) => {
    setState((prevState) => ({ ...prevState, destination: value }));
  };

  const setTotalDistance = (distance) => {
    setState((prevState) => ({ ...prevState, totalDistance: distance }));
  };

  const setTravelTime = (time) => {
    setState((prevState) => ({ ...prevState, travelTime: time }));
  };

  const setTime = (time) => {
    setState((prevState) => ({ ...prevState, time: time }));
  };

  const sourceInputRef = useRef();
  const destinationInputRef = useRef();

  useAutocomplete(sourceInputRef, setSource);
  useAutocomplete(destinationInputRef, setDestination);

  const handleRadioChange = (event) => {
    setSelectedValue(event.target.value);
    // Update the selected value when a radio button is changed
  };

  return {
    ...state,
    setStartDate,
    setReturnDate,
    setSelectedValue,
    setSource,
    setDestination,
    setTotalDistance,
    setTravelTime,
    setTime,
    sourceInputRef,
    destinationInputRef,
    handleRadioChange,
  };
};

export default OutstationDataState;
