import { useRoutes } from 'react-router-dom';
import './App.css';
import Home from './Pages/Home';
import CabListing from './Pages/CabListing';
import DatePickerComponent from './Components/Common/DatePickerComponent';

function App() {
  
  const routes = useRoutes([
    { path: '/', element: <Home /> },
    { path: '/cab/listing', element: <CabListing/> },
    {path: '/cab/date', element: <DatePickerComponent/>}
]);

  return routes;

}

export default App;
