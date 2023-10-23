const useFilterCab = ({ value }) => {
    const [showProduct, setShowProduct] = useState(value);
    const { priceStatus, rateStatus } = useSelector((state) => state.hotelFilterReducer);
    const { cabTypeStatus, cabOptionStatus, capacityStatus } = useSelector((state) => state.cabFilterReducer);
  
    const dispatch = dispatch();
    const router = router();
    const pathname = pathname();
    const searchParams = searchParams();
  
    useEffect(() => {
      const filteredProducts = value?.filter((product) => {
  
        const filteredRanges =
          capacityStatus.length === 0 ||
          capacityStatus.some((range) => {
            const [minCapacity, maxCapacity] = range.split("-").map(Number);
            return product.capacity !== undefined && product.capacity >= minCapacity && product.capacity <= maxCapacity;
          });
  
        return    filteredRanges;
      });
  
      setShowProduct(filteredProducts || value);
  
      const params = new URLSearchParams();
  
      cabTypeStatus.forEach((cabType) => {
        params.append("cabType", cabType);
      });
  
      cabOptionStatus.forEach((option) => {
        params.append("option", option);
      });
  
      capacityStatus.forEach((capacity) => {
        params.append("capacity", capacity);
      });
  
     
  
      router.push(pathname + "?" + decodeURIComponent(params.toString()));
    }, [priceStatus, value, router, pathname, rateStatus, cabOptionStatus, cabTypeStatus, capacityStatus]);
  
    useEffect(() => {
      const params = [
        { name: "price", action: "priceStatus" },
        { name: "rate", action: "rateStatus" },
        { name: "capacity", action: "capacityStatus" },
        { name: "cabType", action: "cabTypeStatus" },
        { name: "option", action: "cabOptionStatus" },
      ];
  
      for (const param of params) {
        const values = searchParams.getAll(param.name);
        if (values.length > 0) {
          if (param.name === "price") {
            const [min, max] = values[0].split(":").map(Number);
            dispatch({ type: param.action, payload: { min, max } });
          } else {
            dispatch({ type: param.action, payload: values });
          }
        }
      }
    }, [searchParams, dispatch]);
  
    return showProduct;
  };
  
  export default useFilterCab;