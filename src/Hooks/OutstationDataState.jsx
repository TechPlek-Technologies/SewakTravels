import { useState, useRef, useEffect } from 'react';
import useAutocomplete from '../Utility/Autocomplete';

const initialState = {
  tomorrow: new Date(),
  dayAfterTomorrow: new Date(),
  startDate: new Date(),
  returnDate: new Date(),
  selectedValue: "Outstation One-Way",
  source: "",
  destination: "",
  totalDistance: 0,
  travelTime: 0,
  time: "12:00 PM",
};
initialState.startDate.setUTCHours(0, 0, 0, 0);
initialState.returnDate.setUTCHours(0, 0, 0, 0);
const OutstationDataState = () => {
  const [state, setState] = useState(initialState);

  // Load state from local storage on initial render
  useEffect(() => {
    const storedState = localStorage.getItem('yourAppStateKey');
    if (storedState) {
      setState(JSON.parse(storedState));
    }
  }, []);

  // Save state to local storage whenever it changes
  useEffect(() => {
    localStorage.setItem('yourAppStateKey', JSON.stringify(state));
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
