type RedirectFunction = (matches: RegExpMatchArray) => string;
interface ShortURL { match: string|RegExp; redirect: string|RedirectFunction; usePage?: boolean };

export const shortURLs: ShortURL[] = [

  // Redirect all queries to https://keyman.com/keyboards; no longer support legacy numeric ids
  {
    match: /^(.*)$/i,
    redirect: (matches: RegExpMatchArray): string => `https://keyman.com/keyboards/?q=${encodeURIComponent(matches[1])}&from=keymankeyboards.com`
  },
];
