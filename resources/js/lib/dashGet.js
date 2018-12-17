export default (obj, path, fallback) => {
    if (!obj || !path) return fallback;
    return (Array.isArray(path) ? path : path.split(".")).reduce((acc, path) => {
      if (acc === undefined) return fallback;
      const value = acc[path];
      return value !== undefined ? value : fallback;
    }, obj);
  };
  