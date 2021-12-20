import React, { useState, useCallback, useEffect, useRef } from "react";

const Recherche = () => {
  const [query, setQuery] = useState("");
  const [results, setResults] = useState([]);
  let timerRef = useRef();

  const callApi = useCallback(() => {
    console.log("Call API");
    fetch(`/api/auteurs/search/${query}`)
        .then((response) => response.json())
        .then((data) => {
            console.log("DATA", data);
            setResults(data);
        });
  }, [query]);

  useEffect(() => {
    if (query.length > 0) {
      clearTimeout(timerRef.current);
      timerRef.current = setTimeout(() => {
        callApi();
      }, 1000);
    }
  }, [query, callApi]);

  const handleChange = (e) => {
    setQuery(e.target.value);
  };
  return (
      <>
        <input type="text" onChange={handleChange} value={query} />
        <ul>
            {results.map((auteur) => {
                return(
                    <li key={auteur.id}>{auteur.name}</li>
                )
            })}
        </ul>
    </>
    
  )
};

export default Recherche;
